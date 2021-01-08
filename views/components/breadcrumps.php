<?php

if($this->currentpage > 1){
    $back = "<li class='page-item'><a class='page-link' href='{$this->uri}page=" . ($this->currentpage - 1) . "'>Назад</a></li>";
}else{
    $back = "<li class='page-item'><a class='page-link'>Назад</a></li>";
}

if($this->currentpage < $this->countpages){
    $forward = "<li class='page-item'><a class='page-link' href='{$this->uri}page=" . ($this->currentpage + 1) . "'>Вперед</a></li>";
}else{
    $forward = "<li class='page-item'><a class='page-link' >Вперед</a></li>";
}

if($this->currentpage > 2){
    $startpage = "<li class='page-item'><a class='page-link' href='{$this->uri}page=1'>&laquo</a></li>";
}else{
    $startpage = "<li class='page-item'><a class='page-link'>&laquo</a></li>";
}

if($this->currentpage < ($this->countpages-1)){
    $endpage = "<li class='page-item'><a class='page-link' href='{$this->uri}page={$this->countpages}'>&raquo</a></li>";
}else{
    $endpage = "<li class='page-item'><a class='page-link'>&raquo</a></li>";
}

$result =  '<ul class="pagination justify-content-center mb-4">' . $startpage . $back . '<li class="page-item"><a class="page-link">' . $this->currentpage . '</a></li>' . $forward . $endpage . '</ul>';
