import {defineConfig} from 'vitepress'

export default defineConfig({
  title: 'Cookies Plugin',
  description: 'Documentation for the Cookies plugin',
  base: '/docs/cookies/v4/',
  lang: 'en-US',
  head: [
    ['meta', {content: 'https://github.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://twitter.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://youtube.com/nystudio107', property: 'og:see_also',}],
    ['meta', {content: 'https://www.facebook.com/newyorkstudio107', property: 'og:see_also',}],
  ],
  themeConfig: {
    socialLinks: [
      {icon: 'github', link: 'https://github.com/nystudio107'},
      {icon: 'twitter', link: 'https://twitter.com/nystudio107'},
    ],
    logo: '/img/plugin-logo.svg',
    editLink: {
      pattern: 'https://github.com/nystudio107/craft-cookies/edit/develop-v4/docs/docs/:path',
      text: 'Edit this page on GitHub'
    },
    algolia: {
      appId: 'FM0B4KJI1X',
      apiKey: 'a7665c2c6a31d3a94c5883f7f9c787db',
      indexName: 'cookies'
    },
    lastUpdatedText: 'Last Updated',
    sidebar: [],
    nav: [
      {text: 'Home', link: 'https://nystudio107.com/plugins/cookies'},
      {text: 'Store', link: 'https://plugins.craftcms.com/cookies'},
      {text: 'Changelog', link: 'https://nystudio107.com/plugins/cookies/changelog'},
      {text: 'Issues', link: 'https://github.com/nystudio107/craft-cookies/issues'},
      {
        text: 'v1', items: [
          {text: 'v5', link: 'https://nystudio107.com/docs/cookies/'},
          {text: 'v4', link: '/'},
          {text: 'v1', link: 'https://nystudio107.com/docs/cookies/v4/'},
        ],
      },
    ]
  },
});
