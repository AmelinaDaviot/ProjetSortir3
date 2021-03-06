<?php

namespace App\Services;


class SecuriteUrlService
{


    /**
     * @param string|null $participantUri
     * @param string|null $modifier
     * @param string|null $uri
     * @return $trouverPseudo : extrait le pseudo dans l'URL
     */
    public function securiserUrl(?string $participantUri, ?string $modifier, ?string $uri){

//        $extraction = strpos($uri, $modifier);
////        dd($extraction);
//        $separation1 = substr($uri, 0, $extraction);
//
////        $trouverPseudo = strpos($separation1, $participantUri);
//
//        $extraction2 = strpos($uri, $participantUri);
//        $separation2 = substr($trouverPseudo, 0, -$extraction2);

        $sep = substr($uri, strpos($uri, $participantUri) +  strlen($participantUri));
        $sep2 = substr($uri, 0, strpos($uri, $modifier));
        $trouverPseudo = $this->before($modifier, $this->after($participantUri, $uri));



//        dd($separation1, $participantUri);
//        dd($sep, $sep2, $sepfinale, $extraction2, $separation1, $separation2, $trouverPseudo);
//        dd($sep, $sep2);

        return $trouverPseudo;
    }

    /**
     * @param string|null $participantUri
     * @param string|null $uri
     * @return false|string|void
     * Retourne '{pseudo}/modifier'
     */
    public function after (?string $participantUri, ?string $uri)
    {
        if (!is_bool(stripos($uri, $participantUri)))
            return substr($uri, stripos($uri, $participantUri) +  strlen($participantUri));
    }

    /**
     * @param string|null $modifier
     * @param string|null $uri
     * @return false|string
     * Retourne '/participant/{pseudo}
     */
    public function before (?string $modifier, ?string $uri)
    {
        return substr($uri, 0, stripos($uri, $modifier));
    }


//    public function between (?string $debut, ?string $fin, ?string $inThat)
//    {
//        return before ($fin, after($debut, $inThat));
//    }


}