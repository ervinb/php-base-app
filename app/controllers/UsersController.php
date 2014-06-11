<?php

use Codefessions\Storage\User\UserRepository as User;

class UsersController extends BaseController {

  public function __construct(User $user)
  {
    $this->user = $user;
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $this->user->all();
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return View::make("users.create");
  }


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    $user = $this->user->create(Input::all());

    if($user->isSaved())
    {
      return Redirect::route("users.index")
        ->with("flash", "User created successfully!");
    }

    return Redirect::route("users.create")
      ->withInput()
      ->withErrors($user->errors());
  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    return $this->user->find($id);
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    return View::make("users.edit");
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    $user = $this->user->update($id);

    if($user->isSaved())
    {
      return Redirect::to("users.show", $id)
        ->with("flash", "User updated!");
    }

    return Redirect::to("users.edit", $id)
      ->withInput()
      ->withErrors($user->errors());
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
