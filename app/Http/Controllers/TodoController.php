<?php

namespace App\Http\Controllers;

use App\Events\AddTodoEvent;
use App\Events\UpdateTodoEvent;
use App\Events\DeleteTodoEvent;

use Illuminate\Http\Request;

use App\Http\Resources\TodoCollection;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Repositories\TodoRepository;

class TodoController extends Controller
{
    /**
     * @var TodoRepository
     */
    private TodoRepository $_repository;

    /**
     * @param TodoRepository $repository
     */
    function __construct(TodoRepository $repository)
    {
        $this->_repository = $repository;
    }

    /**
     * Initial page
     */
    function index(Request $request)
    {
        $userId = 1;
        return view('todo.index', compact('userId'));
    }

    /**
     * API index
     * @return TodoCollectionResource
     */
    function getItems()
    {
        $items = $this->_repository->getLatest();

        $coll = new TodoCollection($items);

        return $coll;
    }

    /**
     * @param TodoRequest $request
     * @param Todo $model
     * @return array
     */
    function store(TodoRequest $request)
    {
        $request->validated();

        $record = $this->_repository->create($request->all());

        $event = new AddTodoEvent($record);



        // send the event to other clients
        broadcast($event)->toOthers();

        return [
            'id' => $record->id
        ];
    }

    /**
     * @param int $todoId
     * @return bool[]
     */
    function delete(int $todoId)
    {
        // @todo igor: log the action here

        $this->_repository->deleteById($todoId);

        // send the event to other clients
        broadcast(new DeleteTodoEvent($todoId))->toOthers();

        return ['result' => true];
    }

    /**
     * @param Request $request
     * @param Todo $todo
     * @param $id
     */
    function toggleCompleted(Request $request, Todo $todo)
    {
        $todo->is_completed = '1' === $request->is_completed ? '1' : '0';
        $todo->save();

        broadcast(new UpdateTodoEvent($todo))->toOthers();

        return ['result' => true];
    }
}
