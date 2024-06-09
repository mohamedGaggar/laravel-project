<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>

<section>

<table class="table">

<thead>
    <tr>


    <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">content</th>
      <th scope="col">attatchment</th>
      <th scope="col">created_by</th>
      <th scope="col">action</th>
    </tr>
  </thead>

  <tbody>

  @foreach ($data as $value)


  <tr>
      <th scope="row">{{$value->id}}</th>
      <td>{{$value->title}}</td>
      <td>{{$value->content}}</td>
      <td>{{$value->attatchment}}</td>
      <td>{{$value->created_by}}</td>
      <td><a href="/admin/{{$value->id}}/profile" type="submit" class="btn btn-danger">Delete</a></td>
    </tr>


    @endforeach
  </tbody>


</table>

</section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
