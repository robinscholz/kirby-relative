<?php
Kirby::plugin('studioscholz/kirby-relative', [
  'tags' => [
    'link' => [
      'attr' => [
        'rel',
        'class',
        'role',
        'title',
        'target',
        'href',
        'text',
        'lang'
      ],
      'html' => function ($tag) {
        $tag->value = $tag->link;

        // Prefix with language attr
        if (empty($tag->lang) === false) {
          $tag->value = $tag->lang;
          if(!$tag->link[0] === '/') {
            $tag->value .= '/';
          }
          $tag->value .= $tag->link;
        }

        return Html::tag('a', $tag->text, [
          'rel'    => $tag->rel,
          'class'  => $tag->class,
          'role'   => $tag->role,
          'title'  => $tag->title,
          'target' => $tag->target,
          'href' => $tag->value,
        ]);
      }
    ]
  ]
]);