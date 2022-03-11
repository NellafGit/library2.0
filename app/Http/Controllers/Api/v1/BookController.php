<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function list(Request $request): JsonResponse
    {
        return response()->json(Book::all('id', 'title', 'year'));
    }

    public function by_id(Request $request, $id): JsonResponse
    {
        $book = Book::where('id', $id)->first(['id', 'title', 'year']);
        foreach($book->authors as $item){
           $author[] = $item->name . ' ' . $item->surname;
        }
        return response()->json(['book' => [
            'id' => $book->id ,
            'title' => $book->title,
            'year' => $book->year,
            'authors' => $author,
        ]]);
    }


    public function update(Request $request, $id): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required|string',
                'year' => 'required|numeric',
            ]
        );
        if ($validator->passes()) {
            // Обновление сообщения
            $book = Book::find($id, ['id', 'title', 'year', 'updated_at']);
            if (!empty($book)) {
                $book->title = $request->title;
                $book->year = $request->year;
                $book->save();

                return response()->json(
                    [
                        'message' => 'Has been updated',
                        'book' => $book,
                    ],
                    200
                );
            }

            return response()->json(
                [
                    'message' => 'Book not found',
                    'errors' => 'Not found',
                ],
                404
            );
        }

        return response()->json([
            'message' => 'Error validation data',
            'errors' => 'Bad Request',
            400,
        ]);
    }

    public function delete(Request $request, $id): JsonResponse
    {
        $book = Book::find($id);
        if (!empty($book)) {
            $book->delete();

            return response()->json(
                [
                    'mesage' => 'Has been deleted',
                ],
                200
            );
        }

        return response()->json(
            [
                'message' => 'Book not found',
                'errors' => 'Not found',
            ],
            404
        );
    }


}
