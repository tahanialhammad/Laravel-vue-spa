<template>
    <AppLayout :title="post.title">
        <Container>
            <h1 class="text-2xl font-bold">{{ post.title }}</h1>
            <span class="block mt-1 text-sm text-gray-600">{{ formattedDate }} ago by {{ post.user.name }}</span>

            <article class="mt-6">
                <!-- make post as paragraphs -->
                <pre class="whitespace-pre-wrap font-sans">{{ post.body }}</pre>
            </article>

            <div class="mt-12">
                <h2 class="text-xl font-semibold">Comments</h2>
                <!-- we use inertia and vue so we dont action , we use submit.. -->
                 <!-- show form only for auth user -->
                <form v-if="$page.props.auth.user" @submit.prevent="addComment" class="mt-4">
                    <div>
                        <InputLabel for="body" class="sr-only">Comment</InputLabel>
                        <TextArea id="body" v-model="commentForm.body" rows="4" placeholder="Speak your mind Spock…" />
                        <InputError :message="commentForm.errors.body" class="mt-1" />
                    </div>
                    <!-- not submit another form if its in processeing  -->
                    <PrimaryButton type="submit" class="mt-3" :disabled="commentForm.processing">Add Comment
                    </PrimaryButton>
                </form>


                <ul class="divide-y mt-4">
                    <li v-for="comment in comments.data" :key="comment.id" class="px-2 py-4">
                        <!-- <Comment :comment="comment" /> -->
                         <!-- to use event -->
                        <Comment @delete="deleteComment" :comment="comment"/>

                    </li>
                </ul>

                <Pagination :meta="comments.meta" :only="['comments']" />
            </div>
        </Container>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { computed } from "vue";
import { formatDistance, parseISO } from "date-fns"; // npm install date-fns --save
import { relativeDate } from "@/Utilities/date.js";
import Container from "@/Components/Container.vue";
import Comment from "@/Components/Comment.vue";
import Pagination from "@/Components/Pagination.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";
import TextArea from "@/Components/TextArea.vue";
import InputError from "@/Components/InputError.vue";

const props = defineProps(['post', 'comments']);

// const formattedDate = computed(() => formatDistance(parseISO(props.post.created_at), new Date()));
const formattedDate = computed(() => relativeDate(props.post.created_at));

//to build object that send to backend
const commentForm = useForm({
    body: '',
});

// const addComment = () => commentForm.post(route('posts.comments.store', props.post.id));
const addComment = () => commentForm.post(route('posts.comments.store', props.post.id), {
    preserveScroll: true,
    onSuccess: () => commentForm.reset(), //reset form after submit
});

const deleteComment = (commentId) => router.delete(route('comments.destroy', { comment: commentId, page: props.comments.meta.current_page }), {
    preserveScroll: true,
});
</script>