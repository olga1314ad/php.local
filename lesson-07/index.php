<?
//загружаем валидатор из composer
    require_once "../vendor/autoload.php";


    $cat= new \Pets\Cat();
    print_r($cat->makeSound());
    //создаем объект класса validator
    $validation= new \Sirius\Validation\Validator;
    //добавляем правила валидации данных
    $validation->add('name', "required");
    $validation->add("email", 'required | email');
     $validation->add("age", 'required | integer | greaterThan(min=111)');

    if($validation->validate($_POST)){
        echo "форма заполнена корректно";
    }
    else{
        foreach ($validation->getMessages() as $field=>$message){
            foreach ($message as $item) {

                echo "<br/>".$field ." :  ".$item;
            }
        }
    }

    ?>
<form method="POST" action="/lesson-07/index.php">
    <input type="text" name="name" placeholder="Введите имя">
    <input type="email" name="email" placeholder="Введите емэйл">
    <input type="text" name="age" placeholder="Введите возраст">
    <button type="submit">Отправить</button>
</form>
