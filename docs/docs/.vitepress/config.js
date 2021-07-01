module.exports = {
    title: 'Cookies Plugin Documentation',
    description: 'Documentation for the Cookies plugin',
    base: '/docs/cookies/',
    lang: 'en-US',
    head: [
        ['meta', { content: 'https://github.com/nystudio107', property: 'og:see_also', }],
        ['meta', { content: 'https://www.youtube.com/channel/UCOZTZHQdC-unTERO7LRS6FA', property: 'og:see_also', }],
        ['meta', { content: 'https://www.facebook.com/newyorkstudio107', property: 'og:see_also', }],
    ],
    themeConfig: {
        repo: 'nystudio107/craft-cookies',
        docsDir: 'docs/docs',
        docsBranch: 'v1',
        algolia: {
            apiKey: 'a9aa53533590e8d50956989fffac164e',
            indexName: 'cookies'
        },
        editLinks: true,
        editLinkText: 'Edit this page on GitHub',
        lastUpdated: 'Last Updated',
    },
};
