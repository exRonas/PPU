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
        Schema::create('coping', function (Blueprint $table) {
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
        Schema::dropIfExists('coping');
    }
};

// INSERT INTO `coping` (`title`) VALUES
// ('Позволяю себе поделиться чувством с другом');

// INSERT INTO `coping` (`title`) VALUES
// ('Стараюсь все сделать так, чтобы иметь возможность наилучшим образом решить проблему');

// INSERT INTO `coping` (`title`) VALUES
// ('Осуществляю поиск всех возможных решений, прежде чем что-то предпринять');

// INSERT INTO `coping` (`title`) VALUES
// ('Пытаюсь отвлечься от проблемы');

// INSERT INTO `coping` (`title`) VALUES
// ('Принимаю сочувствие и понимание от кого-либо');

// INSERT INTO `coping` (`title`) VALUES
// ('Делаю все возможное, чтобы не дать окружающим увидеть, что мои дела плохи');

// INSERT INTO `coping` (`title`) VALUES
// ('Обсуждаю ситуацию с людьми, так как обсуждение помогает мне чувствовать себя лучше');

// INSERT INTO `coping` (`title`) VALUES
// ('Ставлю для себя ряд целей, позволяющих постепенно справляться с ситуацией');

// INSERT INTO `coping` (`title`) VALUES
// ('Очень тщательно взвешиваю возможности выбора');

// INSERT INTO `coping` (`title`) VALUES
// ('Мечтаю, фантазирую о лучших временах');

// INSERT INTO `coping` (`title`) VALUES
// ('Пытаюсь различными способами решать проблему, пока не найду подходящий');

// INSERT INTO `coping` (`title`) VALUES
// ('Доверяю свои страхи родственнику или другу');

// INSERT INTO `coping` (`title`) VALUES
// ('Больше времени, чем обычно, провожу один');

// INSERT INTO `coping` (`title`) VALUES
// ('Рассказываю другим людям о ситуации, так как только ее обсуждение помогает мне прийти к ее разрешению');

// INSERT INTO `coping` (`title`) VALUES
// ('Думаю о том, что нужно сделать, чтобы исправить положение');

// INSERT INTO `coping` (`title`) VALUES
// ('Сосредотачиваюсь полностью на решении проблем');

// INSERT INTO `coping` (`title`) VALUES
// ('Обдумываю про себя план действий');

// INSERT INTO `coping` (`title`) VALUES
// ('Смотрю телевизор дольше, чем обычно');

// INSERT INTO `coping` (`title`) VALUES
// ('Иду к кому-нибудь (другу или специалисту), чтобы он помог мне чувствовать себя лучше');

// INSERT INTO `coping` (`title`) VALUES
// ('Стою твердо и борюсь за то, что мне нужно в этой ситуации');

// INSERT INTO `coping` (`title`) VALUES
// ('Избегаю общения с людьми');

// INSERT INTO `coping` (`title`) VALUES
// ('Переключаюсь на хобби или занимаюсь спортом, чтобы избежать . проблем');

// INSERT INTO `coping` (`title`) VALUES
// ('Иду к другу за советом - как исправить ситуацию');

// INSERT INTO `coping` (`title`) VALUES
// ('Иду к другу, чтобы он помог мне лучше почувствовать проблему');

// INSERT INTO `coping` (`title`) VALUES
// ('Принимаю сочувствие, взаимопонимание друзей');

// INSERT INTO `coping` (`title`) VALUES
// ('Сплю больше обычного');

// INSERT INTO `coping` (`title`) VALUES
// ('Фантазирую о том, что все могло бы быть иначе');

// INSERT INTO `coping` (`title`) VALUES
// ('Представляю себя героем книги или кино');

// INSERT INTO `coping` (`title`) VALUES
// ('Пытаюсь решить проблему');

// INSERT INTO `coping` (`title`) VALUES
// ('Хочу, чтобы люди оставили меня одного');

// INSERT INTO `coping` (`title`) VALUES
// ('Принимаю помощь от друзей или родственников');

// INSERT INTO `coping` (`title`) VALUES
// ('Ищу успокоения у тех, кто знает меня лучше');

// INSERT INTO `coping` (`title`) VALUES
// ('Пытаюсь тщательно планировать свои действия, а не действовать импульсивно под влиянием внешнего побуждения');