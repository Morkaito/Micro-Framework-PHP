
<style>

.container{
  max-width: 1080px;
  margin: 0 auto;
}

.card-header{
  margin-top: 50px;
  display: flex;
  padding: 10px 15px;
  flex-direction: row;
  border: 1px solid #ccc;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  justify-content: space-between;
}

button{
  background-color: #5293d1;
  padding: 10px 15px;
  border-radius: 6px;
  font-size: 18px;
}

.card-body{
  background-color: #e0e0e0;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
  padding: 15px 40px;
  margin-bottom: 50px;
}

.card-body-sub{
  background-color: #fff;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
  padding: 40px;
  margin-bottom: 50px;
}
.card-header-sub{
  margin-top: 50px;
  display: flex;
  padding: 10px 15px;
  flex-direction: row;
  border-bottom: 1px solid #ccc;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  justify-content: space-between;
  background-color: #fff;
}

.float-right{ float: right; }

</style>
<div class="section">
<div class="container">
  <br>
  <?=Session::message('post')?>
  <div class="card-header">
    <h1>Posts</h1>
    <button>
      <a href="<?=URL?>/posts/register">Novo post</a>
    </button>
  </div>
  <div class="card-body">
    
    <?php 
    
    foreach($dados['posts'] as $post){
  
      echo '
      <div class="container">
        <div class="card-header-sub">
          <h1>'.$post['titulo'].'</h1>
        </div>
        <div class="card-body-sub">
        '.$post['texto'].'
        <hr><br>
        Criado por: '.ucwords($post['nome']).' em '.date('d/m/Y H:i',strtotime($post['postDataRegister'])).'
        <button class="float-right">
          <a href="'.URL.'/posts/show/'.$post['postID'].'">Ler mais</a>
        </button>
        </div>
      </div>
      ';

    }
    
    ?>

  </div>
</div>
</div>