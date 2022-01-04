
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="elibrary-app\resources\css\mainpage.css" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>ELibrary</title>

    <style type="text/css">


html,
body {
  height: 100%;
}

body {
  overflow-x: hidden;
}

.slider {
  width: 100%;
  height: 500px;
  display: flex;
  justify-content: stretch;
  overflow-x: hidden;
  scroll-snap-type: x mandatory;
  scroll-behavior: smooth;
  position: relative;
}

  .slide {
    min-width: 100vw;
    scroll-snap-align: start;
    background-size: cover;
    background-repeat: no-repeat;
  }



.slider-text{
  color:#fff;
  font-family: 'Oswald', sans-serif;
  font-size:60px;
  margin-top:5%;
  margin-left:5%;
}
.slider-quote{
  color:#fff;
  font-family: 'Oswald', sans-serif;
  font-size:30px;
  margin-top:5%;
  margin-left:8%;
}
.slider-bottom{
 
}

    </style>
  </head>
  <body>
    
    <!--Navbar-->
    @include('navbar')
    <!--Navbar END-->
    
    {{-- Slider start --}}
    <div class="slider">
      <div class="controls">
        <div class="left"><i class="lni lni-chevron-left-circle"></i></div>
        <div class="right"><i class="lni lni-chevron-right-circle"></i></div>
      </div>
      <div class="slide"> <p class="slider-text">Welcome to <b style="color:#d35400;">E-Book</b> Library</p><p class="slider-quote">"So many books, so little time."</p></div>
      <div class="slide"></div>
      <div class="slide"></div>
      <div class="slide"></div>
    </div>
    {{-- Slider END --}}
    {{-- slider bottom nav --}}
    <div class="slider-bottom">
      <ul class="nav justify-content-left">
        <li class="nav-item">
          <a value="books" class="nav-link active" href="{{url('/')}}">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/create')}}">Add Book</a>
        </li>
       
      </ul>

    @if ($layout == 'index')
    
        <div class="container-fluid mt-4">
  <div class="row">
    
          <section class="col-md-7">
            {{-- Booklist --}}
              @include('booklist')
          </section>
          <section class="col-md-5"></section>  
      </div>
      </div>
        @elseif ($layout == 'create')
        <div class="container-fluid mt-4">
  <div class="row">
          <section class="col">
              @include('booklist')
          </section>
          <section class="col">
            <form action="{{url('/store') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Book Name</label>
                <input name="book_name" type="text" class="form-control" placeholder="Enter book name">
              </div>
              <div class="form-group">
                <label>Author</label>
                <input name="book_author" type="text" class="form-control" placeholder="Enter book author's name">
              </div>
              <div class="form-group">
                <label>Category</label>
                <input name="book_category" type="text" class="form-control" placeholder="Enter book category">
              </div>
             
              <div class="form-group">
                <label>Book File</label>
                @csrf
                <input name="file" type="file" class="form-control" accept=".jpg,.jpeg,.bmp,.png,.gif,.doc,.docx,.csv,.rtf,.xlsx,.xls,.txt,.pdf,.zip" placeholder="upload book file">
                
              </div>
      
              <input type="submit" class="btn btn-info" value="Save">
              <input type="reset" class="btn btn-warning" value="Reset">
              
            </form>

          </section>
        </div>
      </div>
      
      
    @elseif ($layout == 'show')
    <div class="container-fluid mt-4">
  <div class="row">
          <section class="col">
              @include('booklist')
          </section>
          <section class="col"></section>
      </div></div>
    @elseif ($layout == 'edit')
    <div class="container-fluid mt-4">
      <div class="row">
          <section class="col">
              @include('booklist')
          </section>
          <section class="col">
            <form action="{{url('/update/'.$book->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              
              <div class="form-group">
                <label>Book Name</label>
                <input value="{{$book->book_name}}" name="book_name" type="text" class="form-control" placeholder="Enter book name">
              </div>
              <div class="form-group">
                <label>Author</label>
                <input value="{{$book->book_author}}" name="book_author" type="text" class="form-control" placeholder="Enter book author's name">
              </div>
              <div class="form-group">
                <label>Category</label>
                <input value="{{$book->book_category}}" name="book_category" type="text" class="form-control" placeholder="Enter book category">
              </div>
              <div class="form-group">
                <label>Book File</label>
                <input value="" name="upload_file" type="file" class="form-control" placeholder="Upload book category">
              </div>
              <input type="submit" class="btn btn-info" value="Update">
              
              
            </form>

          </section>
      </div></div>

    @endif

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script>console.clear();
        const slider = document.querySelector(".slider");
        const slides = document.querySelectorAll(".slide");
        const left = document.querySelector(".left");
        const right = document.querySelector(".right");
        const slideColors = [
          "url('https://images.unsplash.com/photo-1513185041617-8ab03f83d6c5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80')",
          "url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1890&q=80')",
          "url('https://images.unsplash.com/photo-1533669955142-6a73332af4db?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1574&q=80')",
          "url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=928&q=80')",
        ];
        let scrollValue = 0;
        
        slides.forEach((slide, index) => {
          slide.style.backgroundImage = slideColors[index];
        });
        
        left.addEventListener("click", () => {
          scrollValue -= slider.scrollWidth / slides.length;
        
          if (scrollValue < 0) {
            scrollValue = slider.scrollWidth - slider.scrollWidth / slides.length;
          }
        
          console.log(scrollValue);
          slider.scrollLeft = scrollValue;
        });
        
        right.addEventListener("click", () => {
          scrollValue += slider.scrollWidth / slides.length;
        
          if (scrollValue >= slider.scrollWidth) {
            scrollValue = 0;
          }
        
          slider.scrollLeft = scrollValue;
        });
        
        /*
        
        setInterval(()=>{
          
          scrollValue += window.innerWidth;
          
          if(scrollValue > slider.scrollWidth){
             scrollValue = 0;
             }
          
          
          slider.scrollLeft = scrollValue;
          
        }, 2000);
        
        */
        </script>
  </body>
</html>