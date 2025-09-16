<script setup lang="ts">
import { Link } from '@/types';

interface Props {
  links: Link[];
  searchString: string;
}

const props = withDefaults(defineProps<Props>(), {
  links: () => [],
  searchString: '',
})
</script>

<template>
  <ul>
    <li v-for="link in links">
      <span>{{ link.title }}</span>
      <span>{{ link.link }}</span>
    </li>
  </ul>
</template>