<script lang="ts" setup>
import Breadcrumbs from '@/components/Breadcrumbs.vue';
import { Button } from '@/components/ui/button';
import {
    NavigationMenu,
    NavigationMenuItem,
    NavigationMenuList,
    navigationMenuTriggerStyle
} from '@/components/ui/navigation-menu';
import { Sheet, SheetContent, SheetHeader, SheetTitle, SheetTrigger } from '@/components/ui/sheet';
import { Tooltip, TooltipContent, TooltipProvider, TooltipTrigger } from '@/components/ui/tooltip';
import { toUrl, urlIsActive } from '@/lib/utils';
import { agenda, games, home, images, login, posts, register, team } from '@/routes';
import type { BreadcrumbItem, NavItem } from '@/types';
import { InertiaLinkProps, Link, usePage } from '@inertiajs/vue3';
import {
    CalendarDays,
    Dices,
    Home,
    ImageIcon,
    KeyRoundIcon,
    Menu,
    NewspaperIcon,
    UserRoundPlusIcon,
    Users
} from 'lucide-vue-next';
import { computed } from 'vue';
import { DropdownMenu } from '@/components/ui/dropdown-menu';
import { Avatar } from '@/components/ui/avatar';
import UserMenuContent from '@/components/UserMenuContent.vue';
import AppLogo from '@/components/AppLogo.vue';
import AppLogoIcon from '@/components/AppLogoIcon.vue';

interface Props {
    breadcrumbs?: BreadcrumbItem[];
}

const props = withDefaults(defineProps<Props>(), {
    breadcrumbs: () => []
});

const page = usePage();
const auth = computed(() => page.props.auth);

const isCurrentRoute = computed(
    () => (url: NonNullable<InertiaLinkProps['href']>) =>
        urlIsActive(url, page.url)
);

const activeItemStyles = computed(
    () => (url: NonNullable<InertiaLinkProps['href']>) =>
        isCurrentRoute.value(toUrl(url))
            ? 'text-secondary'
            : ''
);

const mainNavItems: NavItem[] = [
    {
        title: 'Home',
        href: home(),
        icon: Home
    }, {
        title: 'Team',
        href: team(),
        icon: Users
    },

    {
        title: 'Games',
        href: games(),
        icon: Dices
    },
    {
        title: 'Images',
        href: images(),
        icon: ImageIcon
    },
    {
        title: 'Blog',
        href: posts(),
        icon: NewspaperIcon
    },
    {
        title: 'Agenda',
        href: agenda(),
        icon: CalendarDays
    }
];
</script>

<template>
    <div>
        <div class="mx-auto flex h-[6.5rem] items-center px-4 bg-background">
            <!-- Mobile Menu -->
            <div class="lg:hidden">
                <Sheet>
                    <SheetTrigger :as-child="true">
                        <Button
                            class="mr-2 h-9 w-9"
                            size="icon"
                            variant="default"
                        >
                            <Menu class="size-6" />
                        </Button>
                    </SheetTrigger>
                    <SheetContent class="w-[300px] p-6" side="left">
                        <SheetTitle class="sr-only">Navigation Menu</SheetTitle>
                        <SheetHeader class="flex justify-start text-left">
                            <AppLogoIcon />
                        </SheetHeader>
                        <div class="flex h-full flex-1 flex-col justify-between space-y-4 py-6">
                            <nav class="-mx-3 space-y-1">
                                <Link
                                    v-for="item in mainNavItems"
                                    :key="item.title"
                                    :class="activeItemStyles(item.href)"
                                    :href="item.href"
                                    class="flex items-center gap-x-3 rounded-lg px-3 py-2 font-medium hover:text-secondary"
                                >
                                    <component
                                        :is="item.icon"
                                        v-if="item.icon"
                                        class="h-5 w-5"
                                    />
                                    {{ item.title }}
                                </Link>
                            </nav>
                        </div>
                    </SheetContent>
                </Sheet>
            </div>

            <Link :href="home()" class="flex items-center gap-x-2">
                <AppLogo />
            </Link>

            <!-- Desktop Menu -->
            <div class="hidden h-full lg:flex lg:flex-1">
                <NavigationMenu class="ml-10 flex h-full items-stretch">
                    <NavigationMenuList
                        class="flex h-full items-stretch space-x-2"
                    >
                        <NavigationMenuItem
                            v-for="(item, index) in mainNavItems"
                            :key="index"
                            class="relative flex h-full items-center"
                        >
                            <Link
                                :class="[
                                        navigationMenuTriggerStyle(),
                                        activeItemStyles(item.href),
                                        'h-9 cursor-pointer px-3',
                                    ]"
                                :href="item.href"
                            >
                                <component
                                    :is="item.icon"
                                    v-if="item.icon"
                                    class="mr-2 h-4 w-4"
                                />
                                {{ item.title }}
                            </Link>
                            <div
                                v-if="isCurrentRoute(item.href)"
                                class="absolute bottom-0 left-0 h-0.5 w-full translate-y-px"
                            ></div>
                        </NavigationMenuItem>
                    </NavigationMenuList>
                </NavigationMenu>
            </div>

            <div class="ml-auto flex items-center space-x-2">
                <div v-if="auth.user">
                    <DropdownMenu>
                        <DropdownMenuTrigger :as-child="true">
                            <Button
                                class="relative size-10 w-auto rounded-full p-1 focus-within:ring-2 focus-within:ring-primary"
                                size="icon"
                                variant="ghost"
                            >
                                <Avatar
                                    class="size-8 overflow-hidden rounded-full"
                                >
                                    <AvatarImage
                                        v-if="auth.user.avatar"
                                        :alt="auth.user.name"
                                        :src="auth.user.avatar"
                                    />
                                    <AvatarFallback
                                        class="rounded-lg bg-neutral-200 font-semibold text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ getInitials(auth.user?.name) }}
                                    </AvatarFallback>
                                </Avatar>
                            </Button>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent align="end" class="w-56">
                            <UserMenuContent :user="auth.user" />
                        </DropdownMenuContent>
                    </DropdownMenu>
                </div>
                <div v-else class="flex items-center space-x-2">
                    <TooltipProvider :delay-duration="0">
                        <Tooltip>
                            <TooltipTrigger>
                                <Button as-child size="icon" variant="default">
                                    <Link
                                        :href="login()"
                                    >
                                        <KeyRoundIcon class="w-4 h-4" />
                                    </Link>
                                </Button>
                            </TooltipTrigger>
                            <TooltipContent>
                                <p>Login</p>
                            </TooltipContent>
                        </Tooltip>
                    </TooltipProvider>
                    <TooltipProvider :delay-duration="0">
                        <Tooltip>
                            <TooltipTrigger>
                                <Button as-child size="icon" variant="default">
                                    <Link
                                        :href="register()"
                                    >
                                        <UserRoundPlusIcon class="w-4 h-4" />
                                    </Link>
                                </Button>
                            </TooltipTrigger>
                            <TooltipContent>
                                <p>Register</p>
                            </TooltipContent>
                        </Tooltip>
                    </TooltipProvider>
                </div>
            </div>
        </div>


        <div
            v-if="props.breadcrumbs.length > 1"
            class="flex w-full border-b border-sidebar-border/70"
        >
            <div
                class="mx-auto flex h-12 w-full items-center justify-start px-4 text-neutral-500 md:max-w-7xl"
            >
                <Breadcrumbs :breadcrumbs="breadcrumbs" />
            </div>
        </div>
    </div>
</template>

