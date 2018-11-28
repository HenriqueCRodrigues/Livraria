<nav class="IsDesktop">
      <div class="menuHead">
         Browse
      </div>

      <div class="menuBorder">
          @foreach($categories as $category)
              <a href='{{route('buscarLivrosPorCategoria', ['id' => $category->CategoryID, 'name' => $category->CategoryName])}}' class='menuitem'>{{$category->CategoryName}}</a><br/>
          @endforeach
      </div>
   </nav>