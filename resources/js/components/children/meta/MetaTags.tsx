import React from "react";
import { Helmet } from "react-helmet-async";

interface MetaProps {
    title: string,
    description: string,
    canonical?: string,   
    imageUrl?: string,
    type: string,
    permalink: string,
    keyword: string
}

export default class MetaTags extends React.Component<MetaProps, []> {

    render(): React.ReactNode {
        
        return (
            <>
                <Helmet prioritizeSeoTags>
                    <title>{this.props.title}</title>
                    <meta name="description" content={this.props.description} />
                    {this.props.canonical && <link rel="canonical" href={this.props.canonical} />}
                    <meta name="robots" content="index, follow" />
                    <meta name="author" content="Luận văn Hải Minh" />
                    <meta name="keywords" content={this.props.keyword} />
                    <meta property="og:type" content={this.props.type} />
                    <meta property="og:title" content={this.props.title} />
                    <meta property="og:description" content={this.props.description} />
                    <meta property="og:site_name" content={this.props.title} />
                    <meta property="og:image" content="LINK TO THE IMAGE FILE" />
                    <meta property="og:url" content={process.env.MIX_APP_URL + this.props.permalink} />
                </Helmet>
            </>
        );
    }
}