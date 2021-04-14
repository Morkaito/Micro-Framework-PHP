<style>
    .container {
        max-width: 1080px;
        margin: 0 auto;
    }

    .card-header {
        margin-top: 50px;
        display: flex;
        padding: 10px 15px;
        flex-direction: row;
        border: 1px solid #ccc;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        justify-content: space-between;
    }

    button {
        background-color: #5293d1;
        padding: 10px 15px;
        border-radius: 6px;
        font-size: 18px;
        cursor: pointer;
    }

    .card-body {
        background-color: #e0e0e0;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        padding: 15px 40px;
        margin-bottom: 50px;
    }


    .card-body-sub {
        background-color: #fff;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        padding: 40px;
        margin-bottom: 50px;
    }

    .card-header-sub {
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

    #a{ color: #333; cursor: pointer; }

    #btn-edit{
        color: #fff;
        width: 100%;
        margin: 10px;
    }
    #btn-delete{
        background-color: #ed5f5f;
        width: 100%;
        color: #fff;
        margin: 10px;
    }

</style>

<div class="section">
    <div class="container">
        <div class="card-header">
            <h1><a id='a' href="<?=URL?>/posts/index">Voltar</a> \ Post</h1>
        </div>
        <div class="card-body">

            <div class="container">
                <div class="card-header-sub">
                    <h1><?= $dados['post']['titulo'] ?></h1>
                </div>
                <div class="card-body-sub">
                    <?= $dados['post']['texto'] ?>
                    <hr><br>
                    Criado por: <?= ucwords($dados['user']['nome']) ?> em <?= date('d/m/Y H:i', strtotime($dados['post']['criado_em'])) ?>
                </div>
                <?php 

                if($dados['post']['usuario_id'] == $_SESSION['user_id']){
                    echo '
                    <a href="'.URL.'/posts/edit/'.$dados['post']['id'].'"><button id="btn-edit" >Editar</button></a>
                    <a href="'.URL.'/posts/delete/'.$dados['post']['id'].'"><button id="btn-delete" >Deletar</button></a>
                    ';
                }
                
                ?>
            </div>

        </div>
    </div>