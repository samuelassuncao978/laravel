import Content from './custom/content/Block';
import Heading from './custom/heading/Block';
import Title from './custom/title/Block';
import { TypeEditorBlocks } from '../Types';
// Blog
import blogBlockA from './blog/blog-a/Block';
import blogBlockB from './blog/blog-b/Block';
import blogBlockC from './blog/blog-c/Block';
import blogBlockD from './blog/blog-d/Block';
import blogBlockE from './blog/blog-e/Block';
// Hero
import heroBlockA from './hero/hero-a/Block';
// testimonial
import testimonialBlockB from './testimonial/testimonial-b/Block';
// video
import videoBlockB from './video/video-a/Block';

export default [
    Content,
    Title,
    blogBlockA,
    blogBlockB,
    blogBlockC,
    blogBlockD,
    blogBlockE,
    Heading,
    testimonialBlockB,
    heroBlockA,
    videoBlockB,
] as TypeEditorBlocks;
