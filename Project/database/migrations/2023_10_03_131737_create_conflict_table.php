<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conflict', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('answer_a');
            $table->string('answer_b');
            $table->string('answer_c');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conflict');
    }
};

// INSERT INTO `conflict` (`title`, `answer_a`, `answer_b`, `answer_c`) VALUES
// ('Характерно ли для вас стремление к доминированию, т.е. к тому, чтобы подчинить своей воли других?', 'Нет', 'Когда как', 'Да');

// INSERT INTO `conflict` (`title`, `answer_a`, `answer_b`, `answer_c`) VALUES
// ('Есть ли в вашем коллективе люди, которые вас побаиваются, возможно, и ненавидят?', 'Да', 'Затрудняюсь ответить', 'Нет');

// INSERT INTO `conflict` (`title`, `answer_a`, `answer_b`, `answer_c`) VALUES
// ('Кто вы в большей степени?', 'Пацифист', 'Принципиальный', 'Предприимчивый');

// INSERT INTO `conflict` (`title`, `answer_a`, `answer_b`, `answer_c`) VALUES
// ('Как часто вам приходится выступать с критическими суждениями?', 'Часто', 'Периодически', 'Редко');

// INSERT INTO `conflict` (`title`, `answer_a`, `answer_b`, `answer_c`) VALUES
// ('Что для вас было бы наиболее характерно, если бы вы  возглавили новый для вас коллектив?', 'Разработал бы программу развития коллектива на год вперед и убедил бы членов коллектива в ее перспективности', 'Изучил бы, кто есть кто, и установил контакт с лидерами', 'Чаще советовался бы с людьми');

// INSERT INTO `conflict` (`title`, `answer_a`, `answer_b`, `answer_c`) VALUES
// ('В случае неудач какое состояние для вас характерно?', 'Пессимизм', 'Плохое настроение', 'Обида на самого себя');

// INSERT INTO `conflict` (`title`, `answer_a`, `answer_b`, `answer_c`) VALUES
// ('Характерно ли для вас стремление отстаивать и соблюдать традиции вашего коллектива?', 'Да', 'Скорее всего', 'Нет');

// INSERT INTO `conflict` (`title`, `answer_a`, `answer_b`, `answer_c`) VALUES
// ('Относите ли вы себя к людям, которым лучше в глаза сказать горькую правду, чем промолчать?', 'Да', 'Скорее всего', 'Нет');

// INSERT INTO `conflict` (`title`, `answer_a`, `answer_b`, `answer_c`) VALUES
// ('Из трех личностных качеств, с которыми вы боретесь, чаще всего вы стараетесь изжить в себе:', 'Раздражительность', 'Обидчивость', 'Нетерпимость критики других');

// INSERT INTO `conflict` (`title`, `answer_a`, `answer_b`, `answer_c`) VALUES
// ('Кто вы в большей степени?', 'Независимый', 'Лидер', 'Генератор идей');

// INSERT INTO `conflict` (`title`, `answer_a`, `answer_b`, `answer_c`) VALUES
// ('Каким человеком считают вас ваши друзья?', 'Экстравагантным', 'Оптимистом', 'Настойчивым');

// INSERT INTO `conflict` (`title`, `answer_a`, `answer_b`, `answer_c`) VALUES
// ('С чем вам чаще всего вам приходится бороться?', 'С несправедливостью', 'С бюрократизмом', 'С эгоизмом');

// INSERT INTO `conflict` (`title`, `answer_a`, `answer_b`, `answer_c`) VALUES
// ('Что для вас наиболее характерно?', 'Недооценивать свои способности', 'Оценивать свои способности объективно', 'Переоценивать свои способности');

// INSERT INTO `conflict` (`title`, `answer_a`, `answer_b`, `answer_c`) VALUES
// ('Что приводит вас к столкновению и конфликту с людьми?', 'Излишняя инициатива', 'Излишняя критичность', 'Излишняя прямолинейность');


// UPDATE `psychology`.`conflict` SET `answer_a` = 'Нет', `answer_c` = 'Да' WHERE `id` = 2;

// UPDATE `psychology`.`conflict` SET `answer_b` = 'Предприимчивый', `answer_c` = 'Принципиальный' WHERE `id` = 3;

// UPDATE `psychology`.`conflict` SET `answer_a` = 'Редко', `answer_c` = 'Часто' WHERE `id` = 4;

// UPDATE `psychology`.`conflict` SET `answer_a` = 'Чаще советовался бы с людьми', `answer_c` = 'Разработал бы программу развития коллектива на год вперед и убедил бы членов коллектива в ее перспективности' WHERE `id` = 5;

// UPDATE `psychology`.`conflict` SET `answer_a` = 'Обида на самого себя', `answer_b` = 'Пессимизм', `answer_c` = 'Плохое настроение' WHERE `id` = 6;

// UPDATE `psychology`.`conflict` SET `answer_a` = 'Нет', `answer_c` = 'Да' WHERE `id` = 7;

// UPDATE `psychology`.`conflict` SET `answer_a` = 'Нет', `answer_c` = 'Да' WHERE `id` = 8;

// UPDATE `psychology`.`conflict` SET `answer_a` = 'Обидчивость', `answer_b` = 'Раздражительность' WHERE `id` = 9;

// UPDATE `psychology`.`conflict` SET `answer_a` = 'Лидер', `answer_b` = 'Генератор идей', `answer_c` = 'Независимый' WHERE `id` = 10;

// UPDATE `psychology`.`conflict` SET `answer_a` = 'Оптимистом', `answer_b` = 'Экстравагантным' WHERE `id` = 11;

// UPDATE `psychology`.`conflict` SET `answer_a` = 'С эгоизмом', `answer_c` = 'С несправедливостью' WHERE `id` = 12;

// UPDATE `psychology`.`conflict` SET `answer_a` = 'Оценивать свои способности объективно', `answer_b` = 'Недооценивать свои способности' WHERE `id` = 13;