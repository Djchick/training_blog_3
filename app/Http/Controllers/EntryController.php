<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EntryRepository;
use App\Repositories\Entry\EntryRepositoryInterface;
use App\Http\Requests\EntryRequest;
use App\Http\Requests;
use App\Models\Entry;
use Session;

class EntryController extends Controller
{
    protected $entryRepository;

    public function __construct(EntryRepositoryInterface $entryRepository)
    {
        $this->entryRepository = $entryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $entries = $this->entryRepository->all();
        $this->viewData['entries'] = $entries;
        return view('entry.index', $this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('entry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(EntryRequest $request)
    {
        $input = $request->only(['title', 'body', 'user_id']);
        if(!$this->entryRepository->create($input)) {
            return redirect()->route('entry.create')->withErrors(trans('entry/messages.common_error'));
        }
        return redirect()->route('entry.index')->withMessage(trans('entry/messages.create_complete'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $entry = $this->entryRepository->find($id);
        if(!$entry) {
            return redirect()->route('entry.index')->withErrors(trans('entry/messages.not_found_error'));
        }
        $this->viewData['entry'] = $entry;
        return view('entry.show', $this->viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $entry = $this->entryRepository->find($id);
        if(!$entry) {
            return redirect()->route('entry.index')->withErrors(trans('entry/messages.not_found_error'));
        }
        $this->viewData['entry'] = $entry;
        return view('entry.update', $this->viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(EntryRequest $request, $id)
    {
        $input = $request->only(['title', 'body']);
        $update = $this->entryRepository->update($input, $id);
        if($update) {
            return redirect()->route('entry.show', $id)->withMessage(trans('entry/messages.update_complete'));
        }
        return redirect()->route('entry.show', $id)->withErrors(trans('entry/messages.common_error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $entry = $this->entryRepository->delete($id);
        if(!$entry) {
            return redirect()->route('entry.show', $id)->withErrors(trans('entry/messages.common_error'));
        }
        return redirect()->route('entry.index')->withMessage(trans('entry/messages.delete_complete'));
    }
}
