
<!DOCTYPE html>
<html>
  <head>
    <title>Educational registration form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p {
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: #eee;
      }
      body {
      background: url("/uploads/media/default/0001/01/b5edc1bad4dc8c20291c8394527cb2c5b43ee13c.jpeg") no-repeat center;
      background-size: cover;
      }
      h1, h2 {
      text-transform: uppercase;
      font-weight: 400;
      }
      h2 {
      margin: 0 0 0 8px;
      }
      .main-block {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100%;
      padding: 25px;
      background: rgba(0, 0, 0, 0.5);
      }
      .left-part, form {
      padding: 25px;
      }
      .left-part {
      text-align: center;
      }
      .fa-graduation-cap {
      font-size: 72px;
      }
      form {
      background: rgba(0, 0, 0, 0.7);
      }
      .title {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      }
      .info {
      display: flex;
      flex-direction: column;
      }
      input, select {
      padding: 5px;
      margin-bottom: 30px;
      background: transparent;
      border: none;
      border-bottom: 1px solid #eee;
      }
      input::placeholder {
      color: #eee;
      }
      option:focus {
      border: none;
      }
      option {
      background: black;
      border: none;
      }
      .checkbox input {
      margin: 0 10px 0 0;
      vertical-align: middle;
      }
      .checkbox a {
      color: #26a9e0;
      }
      .checkbox a:hover {
      color: #85d6de;
      }
      .btn-item, button {
      padding: 10px 5px;
      margin-top: 20px;
      border-radius: 5px;
      border: none;
      background: #26a9e0;
      text-decoration: none;
      font-size: 15px;
      font-weight: 400;
      color: #fff;
      }
      .btn-item {
      display: inline-block;
      margin: 20px 5px 0;
      }
      button {
      width: 100%;
      }
      button:hover, .btn-item:hover {
      background: #85d6de;
      }
      @media (min-width: 568px) {
      html, body {
      height: 100%;
      }
      .main-block {
      flex-direction: row;
      height: calc(100% - 50px);
      }
      .left-part, form {
      flex: 1;
      height: auto;
      }
      }
    </style>
  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-graduation-cap"></i>
        <h1>Upload Image</h1>
        <p></p>

      </div>
      <div>

        <div class="title">
          <i class="fas fa-pencil-alt"></i>
          <h2>Upload Here</h2>
        </div>
        <div class="info">
            @if(isset($temp))
            <span>{{ route('update_porto', ['id' => $temp['id']]) }}</span>
            <form method="POST" action="{{ route('update_porto', ['id' => $temp['id']]) }}">
                @csrf
                @method("PUT")
                <input type="text" id="file_url" name="file_url" placeholder="Image Url" value= "{{ $temp ? $temp['file_url'] : "" }}"required/>
                <input type="text" id="title" name="title" placeholder="Title" value= "{{ $temp ? $temp['title'] : "" }}" required/>
                <input type="text" id="description" name="description" placeholder="Description" value= "{{ $temp ? $temp['description'] : ""}}"/>
                <input type="int" id="description" name="category_id" placeholder="Category" value= "{{ $temp ? $temp['category_id'] : ""}}"/>
                {{-- <select name="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select> --}}
                <button type="submit">Submit</button>
            </form>
        @else
            <form method="POST" action="{{ route('create_porto') }}">
                @csrf
                <input type="text" id="file_url" name="file_url" placeholder="Image Url" required/>
                <input type="text" id="title" name="title" placeholder="Title" required/>
                <input type="text" id="description" name="description" placeholder="Description" />
                <input type="int" id="description" name="category_id" placeholder="Category" />
                <button type="submit">Submit</button>
            </form>
        @endif

        </div>
    </div>
    </div>
  </body>
</html>
