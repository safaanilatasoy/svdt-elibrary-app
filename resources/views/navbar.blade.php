<style type="text/css">
#add-book-button{
    border-radius:11px; border: 1px solid #3498db;

}
#add-book-button:hover{
    background-color: #3498db;
}
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('/')}}"><b style="color:#3498db;">E-library</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse col" id="navbarNav">
      <ul class="navbar-nav" style="right:20px; position:absolute;">
        <li class="nav-item active" id="add-book-button">
            <a class="nav-link" href="{{url('/create')}}">Add Book</a>
          </li>
  
      </ul>
    </div>
  </nav>