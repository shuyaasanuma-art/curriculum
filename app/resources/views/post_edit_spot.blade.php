@extends('layouts.layout')
<br><br><br><br>
<div class="container container-m">
    <div>
   
        <div>
            
        </div>
    </div>
</div>
<div>
    <div class="container container-m">
        <div>
            <h1 class="text justify-content-center">スポット編集</h1>
        </div>
        <div class='panel-body'>
   @if($errors->any())
   <div class='alert alert-danger'>
      @foreach($errors->all() as $message)
      <li>{{ $message }}</li>
      @endforeach
   </div>
   @endif
</div>
        <div class="row">
            <form action="{{ route('spots.update',$spots->id)}}" method="post">
                @csrf
                @method('PUT')
                <input class="col-4" type="text" name="name" placeholder="{{$spots->name}}">
                <input class="col-4" type="text" name="address" placeholder="{{$spots->address}}">
                <input class="col-10" type="text" name="url" placeholder="{{$spots->url}}">
                <input type="submit" name="button" value="再登録">
            </form>
       </div>
    </div>
    <div class="container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4659.22733592652!2d138.8042243346533!3d36.937387066609126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601e01f2be21bdb5%3A0xa688fd4b20a0c022!2z5rmv5rKi6auY5Y6f44K544Kt44O85aC077yP44OR44OO44Op44Oe44OR44O844Kv!5e0!3m2!1sja!2sus!4v1703564201149!5m2!1sja!2sus"  width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    
    <div class="container">
        <div class="row">
            <a href="{{route('posts.edit',$spots->id)}}" class="col ">
                <button class="btn btn-lg">編集画面に戻る</button>
            </a>
          
        </div>
    </div>
</div>