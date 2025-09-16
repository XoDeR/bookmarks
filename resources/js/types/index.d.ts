import { InertiaLinkProps } from '@inertiajs/vue3';
import type { LucideIcon } from 'lucide-vue-next';

export interface PaginatedResponse<T> {
    data: T[];
    meta: {
        current_page: number;
        from: number;
        last_page: number;
        links: { url: string | null; label: string; active: boolean }[];
        path: string;
        per_page: number;
        to: number;
        total: number;
        [key: string]: any; // optional
    };
    links: {
        first: string;
        last: string;
        prev: string | null;
        next: string | null;
        [key: string]: any;
    };
}

interface Link {
    id: number;
    title: string;
    link: string;
}

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: NonNullable<InertiaLinkProps['href']>;
    icon?: LucideIcon;
    isActive?: boolean;
}

export type AppPageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    sidebarOpen: boolean;
};

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export type BreadcrumbItemType = BreadcrumbItem;
