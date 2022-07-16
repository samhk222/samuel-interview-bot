<?php

namespace Domain\Telegram\Parsers;

use App\Notifications\AttachResumeNotification;
use App\Notifications\BeloHorizontePicture01Notification;
use App\Notifications\BeloHorizontePicture02Notification;
use App\Notifications\CanYouShowMeSomeWorkNotification;
use App\Notifications\CanYouWorkRemotelyNotification;
use App\Notifications\Commands\PreferencesNotification;
use App\Notifications\ContactDisclaimerNotification;
use App\Notifications\ContactInformationCardNotification;
use App\Notifications\EnglishLevelNotification;
use App\Notifications\EnglishLevelOnlineTestNotification;
use App\Notifications\EnglishLevelRecordingNotification;
use App\Notifications\HowCoolIsThatNotification;
use App\Notifications\MySkillsNotification;
use App\Notifications\PreferencesChangedNotification;
use App\Notifications\ResumeDisclaimerNotification;
use App\Notifications\StatisticstNotification;
use App\Notifications\TextNotFoundNotification;
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
            case TextConstants::get("TOGGLE-BUTTON-OPTIONS"):
                // User just asked to toggle preferentes
                return [PreferencesChangedNotification::class, WelcomeNotification::class];
            case TextConstants::get("PREFERENCES"):
                return [PreferencesNotification::class];
            case TextConstants::get("WHO-AM-I"):
                return [WhoAmINotification::class];
            case TextConstants::get("CONTACT_INFORMATION"):
                return [ContactDisclaimerNotification::class, ContactInformationCardNotification::class];
            case TextConstants::get("BELO-HORIZONTE"):
                return [
                    BeloHorizontePicture01Notification::class,
                    BeloHorizontePicture02Notification::class,
                    WhereDoILiveNotification::class,
                ];
            case TextConstants::get("ENGLISH-LEVEL"):
                return [
                    EnglishLevelOnlineTestNotification::class,
                    EnglishLevelRecordingNotification::class,
                    EnglishLevelNotification::class,
                ];
            case TextConstants::get("CAN-YOU-WORK-REMOTELY"):
                return [CanYouWorkRemotelyNotification::class];
            case TextConstants::get("RESUME"):
                return [
                    ResumeDisclaimerNotification::class,
                    AttachResumeNotification::class
                ];
            case TextConstants::get("CAN-YOU-SHOW-ME"):
                return [CanYouShowMeSomeWorkNotification::class];
            case TextConstants::get("START"):
                return [WelcomeNotification::class];
            case TextConstants::get("SKILLS"):
                return [MySkillsNotification::class];
            case TextConstants::get("AVAILABILITY"):
                return [WhenCanYouStartNotification::class];
            case TextConstants::get("STATISTICS"):
            case TextConstants::get("STATISTICS-FROM-MENU"):
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
