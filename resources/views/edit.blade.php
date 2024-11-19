<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">

</head>
<body>

<div class="edit-main">
    <div class="edit-left">
        <form action="{{ route('phonebook.update', $phonebook->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="username">Username</label>
            <input class="edit-input" type="text" name="username" value="{{ old('username', $phonebook->username) }}">
            @error('username')
                <p class="edit-error">{{ $message }}</p>
            @enderror

            <label for="phone_number">Phonenumber</label>
            <input class="edit-input" type="text" name="phone_number" value="{{ old('phone_number', $phonebook->phone_number) }}">
            @error('phone_number')
                <p class="edit-error">{{ $message }}</p>
            @enderror

            <label for="city">City</label>
            <input type="text" name="city" value="{{ old('city', $phonebook->city) }}">
            @error('city')
                <p style="color: red;">{{ $message }}</p>
            @enderror

            <input type="submit" value="Submit" class="edit-submit-button">
        </form>
    </div>
</div>

</body>
</html>
