<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Link, PaginatedResponse } from '@/types';

interface LinksPageProps {
  links: PaginatedResponse<Link>
}

const props = defineProps<LinksPageProps>();

console.log(props.links);
</script>

<template>
  <AppLayout>
    <ul>
      <li v-for="link in links.data">
        <span>{{ link.title }}</span>
        <span>{{ link.link }}</span>
      </li>
    </ul>
  </AppLayout>
</template>
