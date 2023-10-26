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
        Schema::create('suicide', function (Blueprint $table) {
            $table->id();
            $table->string('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suicide');
    }
};

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (1, 'Вы все чувствуете острее, чем большинство людей');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (2, 'Вас часто одолевают мрачные мысли');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (3, 'Теперь Вы уже не надеетесь добиться желаемого положения в жизни');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (4, 'В случае неудачи Вам трудно начать новое дело.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (5, 'Вам определенно не везет в жизни.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (6, 'Учиться Вам стало труднее, чем раньше.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (7, 'Большинство людей довольны жизнью больше, чем Вы.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (8, 'Вы считаете, что смерть является искуплением грехов.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (9, 'Только зрелый человек может принять решение уйти из жизни.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (10, 'Временами у Вас бывают приступы неудержимого смеха или плача.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (11, 'Обычно Вы осторожны с людьми, которые относятся к Вам дружелюбнее, чем Вы ожидали.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (12, 'Вы считаете себя обреченным человеком.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (14, 'У Вас такое впечатление, что Вас никто не понимает.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (15, 'Человек, который вводит других в соблазн, оставляя без присмотра ценное имущество, виноват примерно столько же, сколько и тот, кто это имущество похищает.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (16, 'В Вашей жизни не было таких неудач, когда казалось, что все кончено.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (17, 'Обычно Вы удовлетворены своей судьбой.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (18, 'Вы считаете, что всегда нужно вовремя поставить точку.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (20, 'Когда Вас обижают, Вы стремитесь во что бы то ни стало доказать обидчику, что он поступил несправедливо.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (21, 'Часто Вы так переживаете, что это мешает Вам говорить.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (22, 'Вам часто кажется, что обстоятельства, в которых Вы оказались, отличаются особой несправедливостью.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (23, 'Иногда Вам кажется, что Вы вдруг сделали что-то скверное или даже хуже.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (24, 'Будущее представляется Вам довольно беспросветным.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (25, 'Большинство людей способны добиваться выгоды не совсем честным путем.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (26, 'Будущее слишком расплывчато, чтобы строить серьезные планы.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (27, 'Мало кому в жизни пришлось испытать то, что пережили недавно Вы.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (29, 'Часто Вы действуете необдуманно, повинуясь первому порыву.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (13, 'Мало кто искренне пытается помочь другим, если это связано с неудобствами.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (19, 'В Вашей жизни есть люди, привязанность к которым может очень повлиять на Ваши решения и даже изменить их.');

// INSERT INTO `suicide` (`id`, `title`) VALUES
// (28, 'Вы склонны так остро переживать неприятности, что не можете выкинуть мысли об этом из головы.');