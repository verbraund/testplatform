<?php


namespace App\Controller\Api;

use App\Service\User as UserService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return new JsonResponse($this->userService->getAll());
    }

    public function show($id)
    {
        return new JsonResponse($this->userService->getById($id));
    }

    public function store(Request $request)
    {
        if((bool)$request->getContent()){
            $user = $request->toArray();
            if(isset($user['name']) && isset($user['email'])){
                return new JsonResponse($this->userService->create($user['name'], $user['email']));
            }
        }
        return new JsonResponse(['error' => 'invalid arguments'], 422);
    }




}