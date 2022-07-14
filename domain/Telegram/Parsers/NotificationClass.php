<?php

namespace Domain\Telegram\Parsers;

use App\Notifications\CanYouShowMeSomeWorkNotification;
use App\Notifications\CanYouWorkRemotelyNotification;
use App\Notifications\HowCoolIsThatNotification;
use App\Notifications\MySkillsNotification;
use App\Notifications\StatisticstNotification;
use App\Notifications\TextNotFoundNotification;
use App\Notifications\VotedInNotification;
use App\Notifications\WelcomeNotification;
use App\Notifications\WhenCanYouStartNotification;
use App\Notifications\WhereDoILiveNotification;
use App\Notifications\WhoAmINotification;
use Domain\Telegram\Constants\TextConstants;
use stdClass;

class NotificationClass
{
    private stdClass $body;

    /**
     * UserId constructor.
     * @param stdClass $
     */
    public function __construct(stdClass $body)
    {
        $this->body = $body;
    }

    public function __invoke(): array
    {
        $text = (new Text($this->body))();

        switch ($text) {
            case TextConstants::get("WHO-AM-I"):
                return [WhoAmINotification::class,];
            case TextConstants::get("BELO-HORIZONTE"):
                return [WhereDoILiveNotification::class,];
            case TextConstants::get("CAN-YOU-WORK-REMOTELY"):
                return [CanYouWorkRemotelyNotification::class,];
            case TextConstants::get("CAN-YOU-SHOW-ME"):
                return [CanYouShowMeSomeWorkNotification::class,];
            case TextConstants::get("START"):
                return [WelcomeNotification::class,];
            case TextConstants::get("SKILLS"):
                return [MySkillsNotification::class];
            case TextConstants::get("AVAILABILITY"):
                return [WhenCanYouStartNotification::class];
            case TextConstants::get("STATISTICS"):
                return [StatisticstNotification::class];
            case TextConstants::get("POLL_VOTE"):
                // A poll doesn't have an valid user
                return [];
            case TextConstants::get("HOW_COOL_IS_THAT"):
                return [HowCoolIsThatNotification::class];
            default:
                return [TextNotFoundNotification::class];
        }
    }
}
