<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Link, PaginatedResponse } from '@/types';

interface LinksPageProps {
  links: PaginatedResponse<Link>;
  searchString: string;
  filteredTags: string[];
  showUntaggedOnly: boolean;
}

const props = withDefaults(defineProps<LinksPageProps>(), {
  searchString: '',
  filteredTags: () => [],
  showUntaggedOnly: false,
})

console.log(props.links);
console.log(props.searchString);
console.log(props.filteredTags);
console.log(props.showUntaggedOnly);
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
