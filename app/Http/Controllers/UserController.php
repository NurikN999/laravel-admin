<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @OA\Get (path="/api/users",
     *     security={{"bearerAuth":{}}},
     *     tags={"Users"},
     *     @OA\Response(response="200",
     *         description="User Collection",
     *         ),
     *     @OA\Parameter (
     *         name="page",
     *         description="Pagination page",
     *         in="query",
     *         @OA\Schema (
     *             type="integer"
     * )
     * )
     * )
     */
    public function index()
    {
        $this->authorize('view', 'users');

        return UserResource::collection(User::with('role')->paginate());
    }

    /**
     * @param UserCreateRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @OA\Post (path="/api/users",
     *     security={{"bearerAuth":{}}},
     *     tags={"Users"},
     *      @OA\Response(response="201",
     *          description="Create user",
     *      ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UserCreateRequest")
     *     )
     * )
     */
    public function store(UserCreateRequest $request)
    {
        $this->authorize('edit', 'users');

        $user = User::create(
            $request->only('firstname', 'lastname', 'email', 'role_id')
            + ['password' => \Hash::make(1234)]
        );

        return response(new UserResource($user), Response::HTTP_CREATED);
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @OA\Get (path="/api/users/{id}",
     *     security={{"bearerAuth":{}}},
     *     tags={"Users"},
     *     @OA\Response(response="200",
     *         description="User",
     *         ),
     *     @OA\Parameter (
     *         name="id",
     *         description="User ID",
     *         in="path",
     *         required=true,
     *         @OA\Schema (
     *             type="integer"
     * )
     * )
     * )
     */
    public function show($id)
    {
        $this->authorize('view', 'users');

        return new UserResource(User::with('role')->find($id));
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @OA\Put (path="/api/users/{id}",
     *     security={{"bearerAuth":{}}},
     *     tags={"Users"},
     *     @OA\Response(response="202",
     *         description="User Update",
     *         ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/UserUpdateRequest")
     *     ),
     *     @OA\Parameter (
     *         name="id",
     *         description="User ID",
     *         in="path",
     *         required=true,
     *         @OA\Schema (
     *             type="integer"
     * )
     * )
     * )
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $this->authorize('edit', 'users');
        $user = User::find($id);
        $user->update($request->only('firstname', 'lastname', 'email', 'role_id'));

        return \response(new UserResource($user), Response::HTTP_ACCEPTED);
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @OA\Delete (path="/api/users/{id}",
     *     security={{"bearerAuth":{}}},
     *     tags={"Users"},
     *     @OA\Response(response="204",
     *         description="User Delete",
     *         ),
     *     @OA\Parameter (
     *         name="id",
     *         description="User ID",
     *         in="path",
     *         required=true,
     *         @OA\Schema (
     *             type="integer"
     * )
     * )
     * )
     */
    public function destroy($id)
    {
        $this->authorize('edit', 'users');
        User::destroy($id);

        return \response(null, Response::HTTP_NO_CONTENT);
    }
}
