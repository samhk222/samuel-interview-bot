<?php

namespace App\Notifications;

use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramMessage;

class WhereDoILiveNotification extends BaseNotification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Fluent $body)
    {
        parent::__construct($body);
    }

    public function toTelegram($notifiable)
    {
        $telegram_message = TelegramMessage::create()
            ->content($this->defineContent());

        return $this->messageWithDefaultButtons($telegram_message);
    }

    private function defineContent()
    {
        return <<<EOL
Belo Horizonte is the [sixth-largest](https://en.wikipedia.org/wiki/List_of_largest_cities_in_Brazil) city in Brazil, with a population around 2.7 million and with a metropolitan area of 6 million people. It is the 13th-largest city in South America and the 18th-largest in the Americas. The metropolis is anchor to the [Belo Horizonte metropolitan area](https://en.wikipedia.org/wiki/Greater_Belo_Horizonte), ranked as the third-most populous metropolitan area in Brazil and the 17th-most populous in the Americas. Belo Horizonte is the capital of the state of [Minas Gerais](https://en.wikipedia.org/wiki/Minas_Gerais), Brazil's second-most populous state. It is the first planned modern city in Brazil.

The region was first settled in the early 18th century, but the city as it is known today was planned and constructed in the 1890s, to replace Ouro Preto as the capital of Minas Gerais. The city features a mixture of contemporary and classical buildings, and is home to several modern Brazilian architectural icons, most notably the Pampulha Complex. In planning the city, Aarão Reis and Francisco Bicalho sought inspiration in the urban planning of [Washington, D.C](https://en.wikipedia.org/wiki/Washington,_D.C.). The city has employed notable programs in urban revitalization and food security, for which it has been awarded international accolades.

The city is built on several hills, and is completely surrounded by mountains.[6] There are several large parks in the immediate surroundings of Belo Horizonte. The Mangabeiras Park (Parque das Mangabeiras), 6 km (4 mi) southeast of the city centre in the hills of Curral Ridge (Serra do Curral), has a broad view of the city. It has an area of 2.35 km2 (580 acres), of which 0.9 km2 (220 acres) is covered by the native forest. The Jambeiro Woods (Mata do Jambeiro) nature reserve extends over 912 hectares (2,250 acres), with vegetation typical of the [Atlantic Forest](https://en.wikipedia.org/wiki/Atlantic_Forest). More than 100 species of birds inhabit the reserve, as well as 10 species of mammals.

Font: [wikipedia](https://en.wikipedia.org/wiki/Belo_Horizonte)
EOL;
    }
}
