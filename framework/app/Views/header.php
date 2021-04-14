
<style>

.header{
    background-color: #333;
    color: #fff;
    width: 100%;
    height: 80px;
}

.nav{
    padding: 5px;
    margin: 0 auto;
    max-width: 1720px;
    display: flex;
    justify-content: space-between;
}
.nav ul{
    display: inline-block;
}
.nav ul li{
    cursor: pointer;
    display: inline-block;
    padding: 10px 15px;
}

#list-one{
    margin-top: 10px;
}

#list-two .btn-header {
    padding: 15px 15px;
    border-radius: 6px;
    background-color: #5196cf;
    color: #fff;
    font-size: 17px;
    transition: .2s ease-in-out;
    cursor: pointer;
}
#list-two .btn-header:hover{
    background-color: #4076a3;
}

#exit{
    background-color: #d15a5a;
    padding: 15px 15px;
    border-radius: 6px;
    color: #fff;
    font-size: 17px;
    transition: .2s ease-in-out;
    cursor: pointer;
}

a{ text-decoration: none; color: #fff; }

</style>

<div class="section">
    <header class="header">
        <nav class="nav">
            <ul id="list-one">
                <li><h2>Unset</h2></li>
                <li><a href="<?=URL?>">Home</a></li>
                <li>Sobre nós</li>
            </ul>
            <ul id="list-two">
                <?php 
                
                if(isset($_SESSION['user_id'])){
                    echo '<li>Olá, '.$_SESSION['name'].'</li>
                    <li><button id="exit" ><a href="'.URL.'/usuarios/exit"> Logout </a></button></li>
                    ';
                } else {
                    echo '
                        <li><a href="'.URL.'/usuarios/register"><button class="btn-header"> Cadastre-se</button></a></li>
                        <li><a href="'.URL.'/usuarios/login"><button class="btn-header"> Login </button></a></li>  
                    ';
                }
                
                ?>
            </ul>
        </nav>
    </header>
</div>