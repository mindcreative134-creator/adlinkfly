<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Link $link
 */
$this->assign('title', __('Edit Link: {0}', $link->alias));
$this->assign('description', '');
$this->assign('content_title', __('Edit Link: {0}', $link->alias));
?>

<div class="box box-primary">
    <div class="box-body">

        <?= $this->Form->create($link); ?>

        <?= $this->Form->hidden('id'); ?>

        <?=
        $this->Form->control('status', [
            'label' => __('Status'),
            'options' => [
                1 => __('Active'),
                2 => __('Hidden'),
                3 => __('Inactive'),
            ],
            'class' => 'form-control',
        ]);
        ?>

        <?=
        $this->Form->control('url', [
            'label' => __('Long URL'),
            'class' => 'form-control',
            'type' => 'url',
        ]);
        ?>

        <?=
        $this->Form->control('title', [
            'label' => __('Title'),
            'class' => 'form-control',
            'type' => 'text',
        ]);
        ?>

        <?=
        $this->Form->control('description', [
            'label' => __('Description'),
            'class' => 'form-control',
            'type' => 'textarea',
        ]);
        ?>

        <?=
        $this->Form->control('expiration', [
            'label' => __('Expiration date'),
            'class' => 'form-control',
            'type' => 'datetime',
            'default' => null,
            'empty' => true,
            'value' => null,
            'minYear' => date('Y'),
            'maxYear' => date('Y') + 10,
            'orderYear' => 'asc',
        ]);
        ?>

        <?php
        $ads_options = get_allowed_ads();

        if (count($ads_options) > 1) {
            echo $this->Form->control('ad_type', [
                'label' => __('Advertising Type'),
                'options' => $ads_options,
                //'empty'   => __( 'Choose' ),
                'class' => 'form-control input-sm',
            ]);
        }
        ?>

        <?=
        $this->Form->control('pages_number', [
            'label' => __('SafeLink Pages Count (0 to disable)'),
            'class' => 'form-control',
            'type' => 'number',
            'min' => 0,
            'default' => 0,
        ]);
        ?>

        <?=
        $this->Form->control('safelinks', [
            'label' => __('SafeLinks Domain Pool (One domain/URL per line)'),
            'class' => 'form-control',
            'type' => 'textarea',
            'placeholder' => "example1.com\nexample2.com",
        ]);
        ?>

        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']); ?>

        <?= $this->Form->end(); ?>
    </div>
</div>
