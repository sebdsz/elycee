<?php

namespace App\Paginator;

use Illuminate\Pagination\BootstrapThreePresenter;

class EPresenter extends BootstrapThreePresenter
{

    protected function getDisabledTextWrapper($text)
    {
        if (preg_match('/<span/i', $text)) return '<li class="disabled">' . $text . '</li>';

        return '<li class="disabled"><span>' . $text . '</span></li>';
    }

    protected function getActivePageWrapper($text)
    {
        if (preg_match('/<span/i', $text)) return '<li class="disabled">' . $text . '</li>';

        return '<li class="active"><span>' . $text . '</span></li>';
    }


    public function getPreviousButton($text = '<span class="glyphicon glyphicon-chevron-left"></span>')
    {
        if ($this->paginator->currentPage() <= 1) {
            return $this->getDisabledTextWrapper($text);
        }

        $url = $this->paginator->url(
            $this->paginator->currentPage() - 1
        );

        return $this->getPageLinkWrapper($url, $text, 'prev');
    }

    public function getNextButton($text = '<span class="glyphicon glyphicon-chevron-right"></span>')
    {
        if (!$this->paginator->hasMorePages()) {
            return $this->getDisabledTextWrapper($text);
        }

        $url = $this->paginator->url($this->paginator->currentPage() + 1);

        return $this->getPageLinkWrapper($url, $text, 'next');
    }

}