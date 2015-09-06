<?php

namespace Lifestutor\Services\Store\Http\Controllers;

use Illuminate\Http\Request;

use Lifestutor\Foundation\InvalidInputException;

use Lifestutor\Foundation\Http\Controller;
use Lifestutor\Services\Store\Features\RegisterMemberFeature;

/**
 * @author Jebb Domingo <jebb.domingo@gmail.com>
 */
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->json(['name' => 'Abigail', 'state' => 'CA']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            return $this->serve(RegisterMemberFeature::class);
        } catch(\Exception$e) {
            if ($e instanceof InvalidInputException) {
                return response()->json($e->getErrors());
            } else {
                return response()->json($e->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return response()->json(['name' => 'Baymax', 'state' => 'WA']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}