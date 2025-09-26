<script lang="ts" setup>
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';

defineProps<{}>();
</script>

<template>
    <Head title="Images" />

    <AppLayout>
        <template #header>
            <div class="font-secondary text-secondary font-black">IMAGES</div>
        </template>

        <div>
            <p class="text-white">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi quis pharetra augue, eu maximus
                tellus. Praesent dictum, risus quis interdum interdum, tellus justo vulputate ante, quis gravida
                ligula metus non lectus. Vestibulum sed convallis sem, in pretium arcu. Nullam ac est sollicitudin,
                maximus lectus non, mollis sem. Etiam sagittis tellus sed nibh malesuada finibus. Maecenas diam est,
                elementum ac purus in, efficitur rutrum eros. Proin at diam malesuada, lobortis erat at, pretium
                nunc. Pellentesque euismod eu dolor sit amet malesuada. Vestibulum venenatis, mauris ullamcorper
                blandit facilisis, velit lorem dictum massa, sit amet mollis mauris arcu nec libero. Vestibulum
                euismod sollicitudin lorem, in pellentesque ex maximus quis.

                Cras accumsan gravida interdum. Phasellus sed nunc gravida, tempor arcu eget, feugiat mi. Donec a
                erat sed magna consequat iaculis. Maecenas dapibus purus quis scelerisque molestie. Vivamus pretium
                malesuada neque, vel dictum leo semper id. Sed lobortis eros in nibh ornare aliquam. Curabitur lacus
                nulla, vestibulum ut nulla sed, elementum condimentum orci. Nunc consequat laoreet mauris, elementum
                sollicitudin erat consequat sit amet. Aenean suscipit massa massa, eget lobortis leo facilisis in.
                Donec non pretium turpis. Suspendisse potenti. Etiam in felis eu libero hendrerit condimentum. Sed
                cursus molestie euismod. Phasellus condimentum finibus eros.

                Quisque auctor ut arcu in rhoncus. Sed sem urna, accumsan at massa vitae, consequat dictum nisi.
                Duis lobortis purus ut lectus finibus, posuere vestibulum purus aliquet. Etiam molestie leo sit amet
                condimentum sollicitudin. Integer turpis massa, tristique non posuere elementum, accumsan id sapien.
                Suspendisse lacinia ipsum ac mauris dapibus posuere. Praesent vel pulvinar nisl.

                In condimentum dolor pharetra neque faucibus, eget vestibulum nibh faucibus. Morbi eget fermentum
                est, non aliquet erat. Praesent condimentum finibus est nec bibendum. Integer vitae euismod quam.
                Suspendisse in purus eget nunc bibendum finibus ac sed nunc. Nunc quis vehicula ligula, quis maximus
                est. Donec eu est feugiat, laoreet velit sit amet, efficitur ipsum. Nulla lorem ipsum, dignissim ac
                est non, eleifend auctor magna. Aliquam erat volutpat. Donec consequat nibh ac metus rutrum, eu
                aliquet orci ornare. Aliquam urna mi, tempor congue nibh efficitur, tincidunt aliquet purus.
                Vestibulum in posuere enim. Nunc in ullamcorper quam. Quisque vitae mauris non eros ultrices
                condimentum eget eu nisi.

                Praesent quis imperdiet neque. Nunc suscipit consectetur porta. Donec id tincidunt sem. Ut dapibus a
                orci quis molestie. Praesent ac semper nulla. In vestibulum elit at nisl malesuada fermentum nec
                eget ex. Duis massa quam, eleifend vitae eleifend sodales, feugiat in nunc. Curabitur egestas arcu
                sit amet nibh vehicula dictum. Duis at ante mi.
            </p>
        </div>
        <template #side>SIDE</template>
    </AppLayout>
</template>