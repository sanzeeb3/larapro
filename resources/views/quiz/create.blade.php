
<h1>Create User</h1>

{{ Form::open(['url' => 'quiz/store']) }}
    <ul>

        <li>
            {{ Form::label('question', 'question:') }}
            {{ Form::text('question') }}
        </li>

        <li>
            {{ Form::label('answer', 'answer') }}
            {{ Form::text('answer') }}
        </li>

        <li>
            {{ Form::label('opt1', 'opt1') }}
            {{ Form::text('opt1') }}
        </li>

        <li>
            {{ Form::label('opt2', 'opt2') }}
            {{ Form::text('opt2') }}
        </li>

        <li>
            {{ Form::label('opt3', 'opt3') }}
            {{ Form::text('opt3') }}
        </li>


        <li>
            {{ Form::label('opt4', 'opt4') }}
            {{ Form::text('opt4') }}
        </li>

        <li>
            {{ Form::label('category', 'category') }}
            {{ Form::text('category') }}
        </li>
        <li>
            {{ Form::label('level', 'level') }}
            {{ Form::text('level') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>

{{ Form::close() }}

