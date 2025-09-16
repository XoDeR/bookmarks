<script setup lang="ts">
import LinkListWithTagFilter from '@/components/LinkList/LinkListWithTagFilter.vue';
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

// console.log(props.links);
// console.log(props.searchString);
// console.log(props.filteredTags);
// console.log(props.showUntaggedOnly);
</script>

<template>
  <AppLayout>
    <LinkListWithTagFilter :links="links.data" :searchString="searchString" :filteredTags="filteredTags"
      :showUntaggedOnly="showUntaggedOnly" />
  </AppLayout>
</template>
