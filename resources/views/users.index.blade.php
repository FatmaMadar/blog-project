<!DOCTYPE html>
<html>
<head>
    <title>قائمة المستخدمين</title>
</head>
<body>
    <h1>مرحباً! هؤلاء هم المستخدمون:</h1>
    
    <ul>
        @foreach($users as $user)
            <li>{{ $user->name }} - {{ $user->email }}</li>
        @endforeach
    </ul>

</body>
</html>