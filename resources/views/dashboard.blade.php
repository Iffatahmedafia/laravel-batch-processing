<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CSV Records</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
  text-align: center;
}
table.center {
  margin-left: auto; 
  margin-right: auto;
}

td, th {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.btn {
  text-align:center;
  left:50px;
}

</style>
</head>
<body>
<div>
  <div class="heading">
  <h1 style="text-align:center;margin-top:50px;">File Uploads</h1>
  </div>
  <div class="main">
    <table class="center">

      <tr>
        <th>Time</th>
        <th>File Name</th>
        <th>Status</th>
      </tr>
      <tr>
        
    @if(!is_null($batch))
      <td>{{ $elapsed }}</td>
      <td>{{ $name }}</td>
      @if($batch->finished())
      <td>Completed</td>
      @elseif($batch->progress() == 0) 
      <td>Pending</td>
      @else
      <td>Processing ({{ $batch->progress() }}%)</td> 
      @endif 
    @endif
    </tr>

    @foreach ($batches as $batches)
    <tr>
      <td>{{ \Carbon\Carbon::parse($batches->created_at)->diffForHumans() }}</td>
      <td>{{ $name }}</td>
      <td>Completed</td>
    </tr>
    @endforeach
    </table>
    
    <div class="text-center">
    <a href="{{ route('index') }}" class="btn btn-dark mt-3 mb-2"> <i class="fas fa-arrow-left"></i> Go Back</a>
    </div>
</div>
</div>

<div>
    @if(!is_null($batch) && $batch->progress() < 100)
    <script>
        window.setInterval('refresh()',2000);

        function refresh() {
            window.location.reload();
        }
        </script>
    @endif
</div>

</body>
</html>