<div class="menuBorder">
         <form method="POST" action="{{route('buscarLivros')}}" >
             @csrf
             <input type="text" name="search" autofocus />
            <input type="submit" value="Search" class="button fullWidth" />
         </form>
      </div>