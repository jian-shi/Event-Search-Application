<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Event Finder</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    </head>
    <body>
    @include( '/unchanged' )
 
 <div class="row result">
    <div class="col-md-10 offset-md-1">
        @isset($message)
        <div class="row alert alert-primary" role="alert">{{$message}}</div>
        @endisset
        @isset($events)
        @foreach ($events as $event)
        <div class="row event-item">
            <div class="col-md-4">
              <span>{{{ date('d-m-Y', strtotime($event->start))}}}</span>
              <h3>{{{ $event-> name}}}</h3>
            </div>
            <div class="col-md-4">
                <p>{{{ $event-> description }}}</p>
                <hr>
                <ul>
                    <li><i class="far fa-map"></i><b>Location: </b>{{{ $event-> location }}}</li>
                    <li><i class="fas fa-box-open" style="width: 16px;"></i><b>Category: </b>{{{ $event-> category }}}</li>
                    <li><i class="far fa-clock"></i><b>Time: </b>{{{ date('H:i', strtotime($event->start))}}} - {{{ date('H:i', strtotime($event->finish))}}}</li>
                </ul>
            </div>
            <div class="col-md-4">
                    <img src="https://via.placeholder.com/280x200" alt="">
            </div>
        </div>
        @endforeach
        @endisset
    </div>
 </div>
 
<script type="text/javascript">
        fetch('http://localhost:8000/api/loccat')
        .then(function(response) {
            return response.json();
        })
        .then(function(myJson) {
            let location = myJson.data_location;
            let category = myJson.data_category;
            
            let x = document.getElementsByName('location')[0];
            //x.multiple = true;
            x.options.length=1;

            let y = document.getElementsByName('category')[0];
            //y.multiple = true;
            y.options.length=1;

            location.forEach(function(element){
                let option = document.createElement("option");
                option.text = element;
                x.add(option);
            })

            category.forEach(function(element){
                let option = document.createElement("option");
                option.text = element;
                y.add(option);
            })
        });
</script>
    </body>
</html>
