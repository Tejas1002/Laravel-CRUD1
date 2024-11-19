<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">

</head>
<body>

<div class="main">
    <div class="left">
        <form action="{{ route('phonebook.store') }}" method="post">
            @csrf

            <label for="username">Username</label>
            <input type="text" name="username" value="{{ old('username') }}">
            @error('username')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <label for="phone_number">Phonenumber</label>
            <input type="text" name="phone_number" value="{{ old('phone_number') }}">
            @error('phone_number')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <label for="city">City</label>
            <input type="text" name="city" value="{{ old('city') }}" required>
            @error('city')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <input type="submit" value="Submit" class="submit-button">
        </form>
    </div>

    <div class="right">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phonenumber</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($phonebooks as $phone)
                <tr>
                    <td>{{ $phone->id }}</td>
                    <td>{{ $phone->username }}</td>
                    <td>{{ $phone->phone_number }}</td>
                    <td>{{ $phone->city }}</td>
                    <td class="action-buttons">
                        <form action="{{route('phonebook.delete', ['id' => $phone->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="delete" type="submit">Delete</button>
                        </form>
                        <a href="{{ route('phonebook.edit', $phone->id) }}" class="edit-button">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
