<?php

namespace App\Controller;

use App\Entity\Books;
use App\Repository\BooksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Cocur\Slugify\SlugifyInterface;
use App\Form\BooksType;

class LibraryController extends AbstractController
{
    /** @var BooksRepository $booksRepository */
    
    private $booksRepository;

    public function __construct(BooksRepository $booksRepository)
    {
        $this->booksRepository = $booksRepository;
    }

    /**
     * @Route("/", name="library")
     */
    public function library(): Response
    {
        $books = $this->booksRepository->findAll();

        return $this->render('library/index.html.twig', [
            'books' => $books,
        ]);
    }

    /**
     * @Route("/library/edit", name="edit_list")
     */
    public function libraryEdit(): Response
    {
        $books = $this->booksRepository->findAll();

        return $this->render('library/edit_list.html.twig', [
            'books' => $books,
        ]);
    }

    /**
     * @Route("/library/book/{slug}", name="book_show")
     */
    public function book(Books $book)
    {
        return $this->render('library/book.html.twig', [
            'book' => $book,
        ]);
    }

    /**
     * @Route("/library/new", name="new_book")
     */
    public function addBook(Request $request, SlugifyInterface $slugify)
    {
        $book = new Books();
        $form = $this->createForm(BooksType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $book->setSlug($slugify->slugify($book->getTitle()));
            $book->setCreated(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            return $this->redirectToRoute('library');
        }
        return $this->render('library/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/library/{slug}/edit", name="edit_book")
     */
    public function editBook(Request $request, Books $book, SlugifyInterface $slugify)
    {
        $form = $this->createForm(BooksType::class, $book);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Books $book */
            $book = $form->getData();
            $book->setSlug($slugify->slugify($book->getTitle()));
            $book->setCreated(new \DateTime());

            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            return $this->redirectToRoute('library');
        }
        return $this->render('library/edit.html.twig', [
            'form' => $form->createView()
        ]);

    }

}
