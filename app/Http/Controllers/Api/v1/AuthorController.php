<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function list(Request $request): JsonResponse
    {
        return response()->json(Author::all('id', 'first_name', 'last_name'));
    }

    public function by_id(Request $request, $id): JsonResponse
    {
        return response()->json(Author::where('id', $id)->first(['id', 'first_name', 'last_name']));
    }


    public function update(Request $request, $id): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
            ]
        );
        if ($validator->passes()) {
            // Обновление сообщения
            $author = Author::find($id, ['id', 'first_name', 'last_name', 'updated_at']);
            if (!empty($author)) {
                $author->first_name = $request->first_name;
                $author->last_name = $request->last_name;
                $author->save();

                return response()->json(
                    [
                        'message' => 'Has been updated',
                        'author' => $author,
                    ],
                    200
                );
            }

            return response()->json(
                [
                    'message' => 'Author not found',
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
        $author = Author::find($id);
        if (!empty($author)) {
            $author->delete();

            return response()->json(
                [
                    'message' => 'Has been deleted',
                ],
                200
            );
        }

        return response()->json(
            [
                'message' => 'Author not found',
                'errors' => 'Not found',
            ],
            404
        );
    }


}
