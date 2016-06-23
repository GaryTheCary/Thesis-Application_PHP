@extends('newDesigner.formTemplate')

@section('title')
    <title>Create New User</title>
@endsection

@section('script_stylesheet')
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/newUser.css">
@endsection

@section('form')
    <div class="upspaceholder"></div>
    <div class="logo animated fadeInDown">
        <img src="/assets/logo/logo.svg">
    </div>
    <div class="title_section animated fadeInDown">
        <p>CREATE NEW USER</p>
    </div>
    <div class="form_section animated fadeInDown">
        <div class="spaceholder"></div>
        {!! Form::open(['url' => 'designer/outcome', 'id' => 'form', 'name' => 'new_user']) !!}

        <div class="description_section">
            <p>
                All Fields Are Mandatory
            </p>
        </div>

        <div class="line"></div>

        <div class="spaceholder"></div>
        <div class="section">
            @if($errors->has('firstname'))
                <div class="ui mini input ncol error">
                    <div class="tag"><p>&nbsp; First Name: &nbsp;</p></div>
                    {!! Form::text('firstname') !!}
                </div>
            @else
                <div class="ui mini input ncol">
                    <div class="tag"><p>&nbsp; First Name: &nbsp;</p></div>
                    {!! Form::text('firstname') !!}
                </div>
            @endif
            <div class="mcol"></div>
            @if($errors->has('lastname'))
                <div class="ui mini input ncol error">
                    <div class="tag"><p>&nbsp; Last Name: &nbsp;</p></div>
                    {!! Form::text('lastname') !!}
                </div>
            @else
                <div class="ui mini input ncol">
                    <div class="tag"><p>&nbsp; Last Name: &nbsp;</p></div>
                    {!! Form::text('lastname') !!}
                </div>
            @endif
        </div>

        <div class="spaceholder"></div>
        <div class="section">
            @if($errors->has('username'))
                <div class="ui mini input ncol error">
                    <div class="tag"><p>&nbsp;	User Name: &nbsp;</p></div>
                    {!! Form::text('username') !!}
                </div>
            @else
                <div class="ui mini input ncol">
                    <div class="tag"><p>&nbsp;	User Name: &nbsp;</p></div>
                    {!! Form::text('username') !!}
                </div>
            @endif
            <div class="mcol"></div>
            @if($errors->has('password'))
                <div class="ui mini input ncol error">
                    <div class="tag"><p>&nbsp;	Password: &nbsp;</p></div>
                    {!! Form::password('password') !!}
                </div>
            @else
                <div class="ui mini input ncol">
                    <div class="tag"><p>&nbsp;	Password: &nbsp;</p></div>
                    {!! Form::password('password') !!}
                </div>
            @endif
        </div>
        <div class="spaceholder"></div>
        <div class="subsection fill"></div>
        <div class="spaceholder"></div>
        <div class="section">
            @if($errors->has('email'))
                <div class="ui mini input scol error">
                    <div class="tag"><p>&nbsp; EMail: &nbsp;</p></div>
                    {!! Form::email('email') !!}
                </div>
            @else
                <div class="ui mini input scol">
                    <div class="tag"><p>&nbsp; EMail: &nbsp;</p></div>
                    {!! Form::email('email') !!}
                </div>
            @endif
        </div>
        <div class="spaceholder"></div>
        <div class="section">
            @if($errors->has('phonenumber'))
                <div class="ui mini input ncol error">
                    <div class="tag"><p>&nbsp; Phone: &nbsp;</p></div>
                    {!! Form::text('phonenumber') !!}
                </div>
            @else
                <div class="ui mini input ncol">
                    <div class="tag"><p>&nbsp; Phone: &nbsp;</p></div>
                    {!! Form::text('phonenumber') !!}
                </div>
            @endif
            <div class="mcol">
                {!! Form::button('Verify', ['class' => 'ui mini button', 'id'=>'verifyBtn', 'onclick' => ""]) !!}
            </div>
            <div class="ui mini input ncol">
                <div class="tag"><p>&nbsp;&nbsp;&nbsp; Code: &nbsp;</p></div>
                {!! Form::text('verifycode') !!}
            </div>
        </div>
        <div class="spaceholder"></div>
        <div class="section">
            @if($errors->has('imagefilepath'))
                <div class="ui mini input scol error">
                    <div class="tag"><p>&nbsp; Profile Image: &nbsp;</p></div>
                    <input type="text" name="imagefilepath" id="filePath">
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <input type="file" name="file" id="file" onchange="document.getElementById('filePath').value = this.value" style="display: none">
                    <input type="button" class="ui mini button" id="browseBtn" onclick="file.click()" value="Upload">
                </div>
            @else
                <div class="ui mini input scol">
                    <div class="tag"><p>&nbsp; Profile Image: &nbsp;</p></div>
                    <input type="text" name="imagefilepath" id="filePath">
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <input type="file" name="file" id="file" onchange="document.getElementById('filePath').value = this.value" style="display: none">
                    <input type="button" class="ui mini button" id="browseBtn" onclick="file.click()" value="Upload">
                </div>
            @endif
        </div>
        <div class="spaceholder"></div>
        <div class="subsection fill"></div>
        <div class="spaceholder"></div>
        <div class="agreement_section">
            <h4>REGISTATION AGREEMENT</h4>
            <div class="line"></div>
            <div class="spaceholder"></div>
            <p>Users has to obey following terms:
                <br>&nbsp; 1. jkhdhasdjhasldjhaksdjlkasjd;lasjdjhjkdsamhdb,bnhbdsjasdasd;lasdjjkhsalkjdhlajskhdjsdjk
                <br>&nbsp; 2. hsgadhgjhgvksagdkhjagdhjlasdhjashjdhjamasjhgdjhasdghbjhhjasdjasjkdhasjkdlakjsdkas
                <br>&nbsp; 3.
                <br>&nbsp; 4.
                <br>&nbsp; 5.
                <br>&nbsp; 6.
                <br>&nbsp; 7.
                <br>&nbsp; 8.
                <br>&nbsp; 9.
                <br>&nbsp; 10.
                <br>&nbsp; 11.
            </p>
            <div class="line"></div>
            <div class="spaceholder"></div>
            <div class="checkbox_section">
                {!! Form::label('agree', 'I Agree All the Terms Above') !!}
                {!! Form::checkbox('agree','agree',false,['id'=>'agree','onclick'=>"this.value = this.checked;"]) !!}
            </div>
        </div>
        <div class="spaceholder"></div>
        <div class="subsection fill"></div>
        <div id="submitsection">
            <span class="helper"></span>
            {!! Form::submit('submit', ['id'=>'sumbitBtn', 'name'=>'submit']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection