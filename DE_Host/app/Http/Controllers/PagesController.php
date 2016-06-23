<?php

namespace DEVAPP\Http\Controllers;
use DEVAPP\MessageToClient;
use PhpParser\Node\Expr\Cast\Array_;
use Request;
use DEVAPP\Http\Requests;
use DEVAPP\Http\Requests\NewMessageToUserRequest;


class PagesController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function userprofile(Request $request)
    {
        $selected = [
            "userprofile" => "selected",
            "footweardata" => "unselected",
            "dataanalysis" => "unselected",
            "modelling" => "unselected",
            "message" => "unselected",
            "logout" => "unselected"
        ];
        // Compact Function for pass the variables, which can decide which sections users are in right now

        return view('Pages.userprofile', $selected);
    }

    public function footweardata(){

        $selected = [
            "userprofile" => "unselected",
            "footweardata" => "selected",
            "dataanalysis" => "unselected",
            "modelling" => "unselected",
            "message" => "unselected",
            "logout" => "unselected"
        ];

        return view('Pages.footweardata', $selected);
    }

    public function dataanalysis(){
        $selected = [
            "userprofile" => "unselected",
            "footweardata" => "unselected",
            "dataanalysis" => "selected",
            "modelling" => "unselected",
            "message" => "unselected",
            "logout" => "unselected"
        ];

        return view('Pages.dataanalysis', $selected);

    }

    public function dataanalysis_PPD(){
        $selected = [
            "userprofile" => "unselected",
            "footweardata" => "unselected",
            "dataanalysis" => "selected",
            "modelling" => "unselected",
            "message" => "unselected",
            "logout" => "unselected"
        ];
        return view('Pages.ppd', $selected);
    }

    public function dataanalysis_COP(){
        $selected = [
            "userprofile" => "unselected",
            "footweardata" => "unselected",
            "dataanalysis" => "selected",
            "modelling" => "unselected",
            "message" => "unselected",
            "logout" => "unselected"
        ];

        return view('Pages.cop', $selected);
    }

    public function dataanalysis_MA()
    {
        $variables = [
            'message' => 'Sorry! This function is not available yet..',
            'title' => 'Sorry...',
            'redirect' => 'please click here and go back to the menu'
        ];
        return view('Pages.ma', $variables);
    }

    public function modelling(){
         $selected = [
            "userprofile" => "unselected",
            "footweardata" => "unselected",
            "dataanalysis" => "unselected",
            "modelling" => "selected",
            "message" => "unselected",
             "logout" => "unselected"
        ];

        return view('Pages.modelling', $selected);
    }

    public function messageToUser()
    {
        $selected = [
            "userprofile" => "unselected",
            "footweardata" => "unselected",
            "dataanalysis" => "unselected",
            "modelling" => "unselected",
            "message" => "selected",
            "logout" => "unselected"
        ];

        return view('Pages.message', $selected);
    }

    /**
     * @param NewMessageToUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function messageToUserPost(NewMessageToUserRequest $request)
    {
        $this->create($request->all());

        flash()->overlay('Greate', 'You message has send successfully');
        return redirect()->back();

    }

    public function homepage(){
        // TODO:
        // TODO: Next time we gotta fetch the variables from database
        $variables = [
            "title" => 'Dashboard',
            "userImage" => "/assets/user/profile.png",
            "userName" => "Max Diamegio",
            "redirect" => '/userprofile'
        ];
        return view('Pages.homepage', $variables);
    }

    protected function create(array $data)
    {
        return MessageToClient::create(
            [
                'designer' => $data['designer'],
                'user' => $data['user'],
                'title' => $data['title'],
                'body' => $data['body']
            ]
        );
    }
}
