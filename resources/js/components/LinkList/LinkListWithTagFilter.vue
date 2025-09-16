<script setup lang="ts">
import { Link } from '@/types';
import LinkList from './LinkList.vue';

interface Props {
  links: Link[];
  searchString: string;
  filteredTags: string[];
  showUntaggedOnly: boolean;
}

const props = withDefaults(defineProps<Props>(), {
  links: () => [],
  searchString: '',
  filteredTags: () => [],
  showUntaggedOnly: false,
})

</script>

<template>
  <LinkList :links="links" :searchString="searchString" />
</template>